import React, { useState, useEffect } from "react";
import axios from "axios";
import { Card } from "flowbite-react";

export default function BooksCard() {
    const [bookCount, setBookCount] = useState(null); // Initialize as null or appropriate initial value

    useEffect(() => {
        axios
            .get("http://127.0.0.1:8000/api/admin/products")
            .then((response) => {
                const booksData = response.data["books"];
                if (booksData) {
                    // Assuming the first book or adjust according to your data structure
                    setBookCount(booksData.length);
                }
            });
    }, []);

    return (
        <Card className="max-w-sm" horizontal>
            <h5 className="text-xs sm:text-sm md:text-md lg:text-lg xl:text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                Amount of Books
            </h5>
            <p className="font-normal text-gray-700 text-4xl dark:text-gray-400">
                {bookCount !== null ? bookCount : "Loading..."}
            </p>
        </Card>
    );
}
