import React, { useState, useEffect } from "react";
import axios from "axios";
import { Card } from "flowbite-react";

export default function UsersCard() {
    const [totalUsers, setTotalUsers] = useState(0);
    const token = localStorage.getItem("token");

    useEffect(() => {
        axios
            .get("/api/admin/total-users", {
                headers: { Authorization: `Bearer ${token}` },
            })
            .then((response) => {
                setTotalUsers(response.data.totalUsers);
            })
            .catch((error) => {
                console.error(
                    "There was an error fetching the total number of users: ",
                    error,
                );
            });
    }, []);

    return (
        <Card className="max-w-sm xl:p-2" horizontal>
            <h5 className="text-xs sm:text-sm md:text-md lg:text-lg xl:text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                Amount of Customers
            </h5>
            <p className="font-normal text-gray-700 text-4xl dark:text-gray-400">
                {totalUsers}
            </p>
        </Card>
    );
}
