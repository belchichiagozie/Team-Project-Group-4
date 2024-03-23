import React, { useState, useEffect, useMemo } from "react";
import axios from "axios";

export default function Products() {
    const [user, setUser] = useState([]);
    function formatDate(dateString) {
        const options = {
            year: "numeric",
            month: "long",
            day: "numeric",
            hour: "2-digit",
            minute: "2-digit",
        };
        return new Date(dateString).toLocaleDateString(undefined, options);
    }

    function smallFormatDate(dateString) {
        const options = {
            month: "short",
            day: "numeric",
        };
        return new Date(dateString).toLocaleDateString(undefined, options);
    }

    const fetchData = () => {
        const token = localStorage.getItem("token");
        return axios
            .get("/api/admin/get-users", {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then((response) => setUser(response.data["users"]));
    };

    useEffect(() => {
        fetchData();
    }, []);
    const [sortConfig, setSortConfig] = useState({
        key: null,
        direction: "ascending",
    });
    const sortedUsers = useMemo(() => {
        let sortableUsers = [...user];
        if (sortConfig !== null) {
            sortableUsers.sort((a, b) => {
                if (a[sortConfig.key] < b[sortConfig.key]) {
                    return sortConfig.direction === "ascending" ? -1 : 1;
                }
                if (a[sortConfig.key] > b[sortConfig.key]) {
                    return sortConfig.direction === "ascending" ? 1 : -1;
                }
                return 0;
            });
        }
        return sortableUsers;
    }, [user, sortConfig]);
    const requestSort = (key) => {
        let direction = "ascending";
        if (sortConfig.key === key && sortConfig.direction === "ascending") {
            direction = "descending";
        }
        setSortConfig({ key, direction });
    };

    return (
        <div className="border border-solid rounded-lg">
            <table className="w-max">
                <thead className="text-white bg-cyan-950 text-blue-900 font-bold w-full">
                    <tr className="">
                        <th onClick={() => requestSort("name")}>
                            Name{" "}
                            {sortConfig.key === "name"
                                ? sortConfig.direction === "ascending"
                                    ? "🔼"
                                    : "🔽"
                                : ""}
                        </th>
                        <th onClick={() => requestSort("email")} className="">
                            Email{" "}
                            {sortConfig.key === "email"
                                ? sortConfig.direction === "ascending"
                                    ? "🔼"
                                    : "🔽"
                                : ""}
                        </th>
                        <th onClick={() => requestSort("id")} className="">
                            ID{" "}
                            {sortConfig.key === "id"
                                ? sortConfig.direction === "ascending"
                                    ? "🔼"
                                    : "🔽"
                                : ""}
                        </th>
                        <th
                            className="hidden sm:table-cell"
                            onClick={() => requestSort("created_at")}
                        >
                            Registration Date{" "}
                            {sortConfig.key === "created_at"
                                ? sortConfig.direction === "ascending"
                                    ? "🔼"
                                    : "🔽"
                                : ""}
                        </th>
                        <th
                            className="table-cell sm:hidden"
                            onClick={() => requestSort("created_at")}
                        >
                            Reg.Date{" "}
                            {sortConfig.key === "created_at"
                                ? sortConfig.direction === "ascending"
                                    ? "🔼"
                                    : "🔽"
                                : ""}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {sortedUsers &&
                        sortedUsers.length > 0 &&
                        sortedUsers.map((userObj) => (
                            <tr key={userObj.id}>
                                <td className="font-bold">{userObj.name}</td>
                                <td className="">{userObj.email}</td>
                                <td className="">{userObj.id}</td>
                                <td className="sm:table-cell hidden">
                                    {formatDate(userObj.created_at)}
                                </td>
                                <td className="sm:hidden">
                                    {smallFormatDate(userObj.created_at)}
                                </td>
                            </tr>
                        ))}
                </tbody>
            </table>
        </div>
    );
}
