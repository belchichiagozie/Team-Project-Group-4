// import React, { useState, useEffect, useMemo } from "react";
// import axios from "axios";

// function formatDate(dateString) {
//     const options = {
//         year: "numeric",
//         month: "long",
//         day: "numeric",
//         hour: "2-digit",
//         minute: "2-digit",
//     };
//     return new Date(dateString).toLocaleDateString(undefined, options);
// }

// function smallFormatDate(dateString) {
//     const options = {
//         month: "short",
//         day: "numeric",
//     };
//     return new Date(dateString).toLocaleDateString(undefined, options);
// }

// export default function Orders() {
//     const [orders, setOrders] = useState([]);
//     const token = localStorage.getItem("token");

//     useEffect(() => {
//         axios
//             .get("/api/admin/orders", {
//                 headers: { Authorization: `Bearer ${token}` },
//             })
//             .then((response) => {
//                 setOrders(response.data.orders);
//             })
//             .catch((error) => {
//                 console.error(
//                     "There was an error fetching the orders: ",
//                     error,
//                 );
//             });
//     }, []);

//     const [sortConfig, setSortConfig] = useState({
//         key: null,
//         direction: "ascending",
//     });

//     const requestSort = (key) => {
//         let direction = "ascending";
//         if (sortConfig.key === key && sortConfig.direction === "ascending") {
//             direction = "descending";
//         }
//         setSortConfig({ key, direction });
//     };

//     const sortedOrders = useMemo(() => {
//         let sortableOrders = [...orders];
//         if (sortConfig.key) {
//             sortableOrders.sort((a, b) => {
//                 let aValue = a[sortConfig.key];
//                 let bValue = b[sortConfig.key];

//                 if (!isNaN(Number(aValue)) && !isNaN(Number(bValue))) {
//                     aValue = Number(aValue);
//                     bValue = Number(bValue);
//                 }

//                 if (Date.parse(aValue) && Date.parse(bValue)) {
//                     aValue = new Date(aValue);
//                     bValue = new Date(bValue);
//                 }

//                 if (aValue < bValue) {
//                     return sortConfig.direction === "ascending" ? -1 : 1;
//                 }
//                 if (aValue > bValue) {
//                     return sortConfig.direction === "ascending" ? 1 : -1;
//                 }
//                 return 0;
//             });
//         }
//         return sortableOrders;
//     }, [orders, sortConfig]);

//     return (
//         <div className="border border-solid rounded-lg">
//             <table className="w-max text-2xs sm:text-sm  text-left text-black dark:text-white">
//                 <thead className="text-white bg-cyan-950 text-blue-900 font-bold w-full">
// <tr>
//     <th
//         scope="col"
//         onClick={() => requestSort("Order_ID")}
//         className="hidden sm:table-cell cursor-pointer"
//     >
//         Order ID
//         {sortConfig.key === "Order_ID"
//             ? sortConfig.direction === "ascending"
//                 ? "🔼"
//                 : "🔽"
//             : ""}
//     </th>
//     <th
//         scope="col"
//         className="table-cell sm:hidden cursor-pointer"
//     >
//         ID
//         {sortConfig.key === "Order_ID"
//             ? sortConfig.direction === "ascending"
//                 ? "🔼"
//                 : "🔽"
//             : ""}
//     </th>
//     <th scope="col">Customer</th>
//     <th
//         scope="col"
//         className="table-cell md:hidden lg:table-cell"
//     >
//         Book
//     </th>
//     <th scope="col" className="md:table-cell hidden">
//         Title
//     </th>
//     <th
//         scope="col"
//         className="cursor-pointer"
//         onClick={() => requestSort("Quantity")}
//     >
//         Quantity
//         {sortConfig.key === "Quantity"
//             ? sortConfig.direction === "ascending"
//                 ? "🔼"
//                 : "🔽"
//             : ""}
//     </th>
//     <th scope="col">Spent (£)</th>
//     <th
//         scope="col"
//         onClick={() => requestSort("created_at")}
//         className="hidden sm:table-cell cursor-pointer"
//     >
//         Order Date
//     </th>
// </tr>
//                 </thead>
//                 <tbody>
// {sortedOrders.map((order) =>
//     order.items.map((item, itemIndex) => (
//         <tr key={itemIndex}>
//             <td className="">{order.Order_ID}</td>
//             <td>{order.userName}</td>
//             <td className="table-cell md:hidden lg:table-cell">
//                 <img
//                     src={`/images/${item.book.file}`}
//                     alt={item.book.Title}
//                     className="w-16 h-16 object-cover rounded-lg"
//                 />
//             </td>
//             <td className="md:table-cell hidden">
//                 {item.book.Title}
//             </td>
//             <td>{item.Quantity}</td>
//             <td>£{item.totalAmountSpent.toFixed(2)}</td>
//             <td className="sm:table-cell md:hidden lg:table-cell hidden">
//                 {formatDate(item.created_at)}
//             </td>
//             <td className="md:table-cell lg:hidden sm:hidden hidden">
//                 {smallFormatDate(item.created_at)}
//             </td>
//         </tr>
//     )),
// )}
//                 </tbody>
//             </table>
//         </div>
//     );
// }

import React, { useState, useEffect, useMemo } from "react";
import axios from "axios";

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
    const options = { month: "short", day: "numeric" };
    return new Date(dateString).toLocaleDateString(undefined, options);
}

export default function Orders() {
    const [orders, setOrders] = useState([]);
    const [users, setUsers] = useState([]);
    const [selectedUserId, setSelectedUserId] = useState("");
    const token = localStorage.getItem("token");

    useEffect(() => {
        axios
            .get("/api/admin/get-orders", {
                headers: { Authorization: `Bearer ${token}` },
            })
            .then((response) => {
                setOrders(response.data.orders || []);
            })
            .catch((error) => {
                console.error(
                    "There was an error fetching the orders: ",
                    error,
                );
            });
    }, [token]);

    useEffect(() => {
        axios
            .get("/api/admin/get-users", {
                headers: { Authorization: `Bearer ${token}` },
            })
            .then((response) => {
                setUsers(response.data.users || []);
            })
            .catch((error) => {
                console.error("There was an error fetching the users: ", error);
            });
    }, [token]);

    const userSpecificOrders = useMemo(() => {
        if (selectedUserId === "") {
            return orders;
        }
        return orders.filter(
            (order) => order.User_ID.toString() === selectedUserId,
        );
    }, [orders, selectedUserId]);

    return (
        <div className="border border-solid rounded-lg">
            <select
                value={selectedUserId}
                onChange={(e) => setSelectedUserId(e.target.value)}
                className="m-4 text-black"
            >
                <option value="">Select a User</option>
                {users.map((user) => (
                    <option key={user.id} value={user.id}>
                        {user.name}
                    </option>
                ))}
            </select>
            {userSpecificOrders.map((order, index) => (
                <div key={index} className="mb-4">
                    <h2 className="text-lg">
                        Order ID: {order.Order_ID} - Date:{" "}
                        {formatDate(order.Created_At)}
                    </h2>
                    <table className="w-full text-xs sm:text-sm text-left text-black dark:text-white">
                        <thead className="text-white bg-cyan-950 text-blue-900 font-bold">
                            <tr>
                                <th>Title</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total Spent</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            {order.items.map((item, itemIndex) => (
                                <tr key={itemIndex}>
                                    <td>{item.book.Title}</td>
                                    <td>{item.Quantity}</td>
                                    <td>£{item.book.Price.toFixed(2)}</td>
                                    <td>
                                        £
                                        {(
                                            item.Quantity * item.book.Price
                                        ).toFixed(2)}
                                    </td>
                                    <td>{smallFormatDate(item.created_at)}</td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                </div>
            ))}
        </div>
    );
}
