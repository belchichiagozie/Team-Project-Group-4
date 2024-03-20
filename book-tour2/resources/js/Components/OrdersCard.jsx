import React, { useState, useEffect } from "react";
import axios from "axios";
import { Card } from "flowbite-react";

export default function OrdersCard() {
    const [book, setBook] = useState(null);
    const token = localStorage.getItem("token");

    useEffect(() => {
        axios
            .get("http://127.0.0.1:8000/api/admin/products", {
                headers: { Authorization: `Bearer ${token}` },
            })
            .then((response) => {
                const booksData = response.data["books"];
                if (booksData && booksData.length > 0) {
                    // Assuming the first book or adjust according to your data structure
                    setBook(booksData[0]);
                }
            });
    }, []);

    return (
        <Card className="max-w-sm xl:p-2" horizontal>
            <h5 className="text-xs sm:text-sm md:text-md lg:text-lg xl:text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                Amount of Orders
            </h5>
            <p className="font-normal text-gray-700 text-4xl dark:text-gray-400">
                0
            </p>
        </Card>
    );
}
