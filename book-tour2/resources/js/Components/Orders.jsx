import React, { useState, useEffect } from "react";
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

export default function Orders() {
    const [orders, setOrders] = useState([]);
    const token = localStorage.getItem("token");

    useEffect(() => {
        axios
            .get("/api/admin/orders", {
                headers: { Authorization: `Bearer ${token}` },
            })
            .then((response) => {
                setOrders(response.data.orders);
            })
            .catch((error) => {
                console.error(
                    "There was an error fetching the orders: ",
                    error,
                );
            });
    }, []);

    return (
        <div className="border border-solid rounded-lg">
            <table className="w-max text-sm text-left text-black dark:text-white">
                <thead className="text-white bg-cyan-950 text-blue-900 font-bold w-full">
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Image</th>
                        <th scope="col">Book Title</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Amount Spent</th>
                        <th scope="col">Order Date</th>
                    </tr>
                </thead>
                <tbody>
                    {orders.map((order) =>
                        order.items.map((item, itemIndex) => (
                            <tr key={itemIndex}>
                                <td>{order.Order_ID}</td>
                                <td>{order.userName}</td>
                                <td>
                                    <img
                                        src={`/images/${item.book.file}`}
                                        alt={item.book.Title}
                                        className="w-16 h-16 object-cover rounded-lg"
                                    />
                                </td>
                                <td>{item.book.Title}</td>
                                <td>{item.Quantity}</td>
                                <td>£{item.totalAmountSpent.toFixed(2)}</td>
                                <td>{formatDate(item.created_at)}</td>
                            </tr>
                        )),
                    )}
                </tbody>
            </table>
        </div>
    );
}
