import React, { useState, useEffect } from "react";
import axios from "axios";
import { Card } from "flowbite-react";

export default function BooksCard() {
    const [bookCount, setBookCount] = useState(null);
    const token = localStorage.getItem("token");

    useEffect(() => {
        axios
            .get(`/api/admin/products`, {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then((response) => {
                const booksData = response.data["books"];
                if (booksData) {
                    setBookCount(booksData.length);
                }
            });
    }, []);

    return (
        <Card className="max-w-sm xl:p-2" horizontal>
            <h5 className="text-xs sm:text-sm md:text-md lg:text-lg xl:text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                Amount of Books
            </h5>
            <p className="font-normal text-gray-700 text-4xl dark:text-gray-400">
                {bookCount !== null ? bookCount : "Loading..."}
            </p>
        </Card>
    );
}
