import React, { useState, useEffect } from "react";
import axios from "axios";
import { Card } from "flowbite-react";

export default function SalesCard() {
    const [totalSales, setTotalSales] = useState(0);
    const token = localStorage.getItem("token");

    useEffect(() => {
        axios
            .get("/api/admin/total-sales", {
                headers: { Authorization: `Bearer ${token}` },
            })
            .then((response) => {
                setTotalSales(response.data.totalSales);
            })
            .catch((error) => {
                console.error(
                    "There was an error fetching the total sales amount: ",
                );
            });
    }, []);

    return (
        <Card className="max-w-sm xl:p-2" horizontal>
            <h5 className="text-xs sm:text-sm md:text-md lg:text-lg xl:text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                Sales (£):
            </h5>
            <p className="font-normal hover:text-base text-gray-700 text-3xl dark:text-gray-400">
                £{totalSales.toFixed(2)}
            </p>
        </Card>
    );
}
