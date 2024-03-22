import React, { useState, useEffect } from "react";
import axios from "axios";
import { Card } from "flowbite-react";

export default function OrdersCard() {
    const [ordersCount, setOrdersCount] = useState();
    const token = localStorage.getItem("token");

    useEffect(() => {
        axios
            .get("/api/admin/orders", {
                headers: { Authorization: `Bearer ${token}` },
            })
            .then((response) => {
                const ordersData = response.data["orders"];
                if (ordersData) {
                    setOrdersCount(ordersData.length);
                }
            })
            .catch((error) => {
                console.error(
                    "There was an error fetching the orders: ",
                    error,
                );
            });
    }, []);

    return (
        <Card className="max-w-sm xl:p-2" horizontal>
            <h5 className="text-xs sm:text-sm md:text-md lg:text-lg xl:text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                Amount of Orders
            </h5>
            <p className="font-normal text-gray-700 text-4xl dark:text-gray-400">
                {ordersCount !== null ? ordersCount : "Loading..."}
            </p>
        </Card>
    );
}
