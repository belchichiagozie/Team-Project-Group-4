// "use client";

// import { Card } from "flowbite-react";
// import axios from "axios";
// import React, { useState, useEffect } from "react";

// export default function BooksCard() {
//     const [book, setBook] = useState([]);
//     let count = 0;
//     useEffect(() => {
//         axios
//             .get("http://127.0.0.1:8000/api/admin/products")
//             .then((response) => setBook(response.data["books"]));
//     }, []);
//     return (
//         <Card className="max-w-sm" imgSrc="/images/blog/image-4.jpg" horizontal>
//             <h5 className="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
//                 Amount of Books
//             </h5>
//             <p className="font-normal text-gray-700 dark:text-gray-400">
//                 {book ? book.Title.length : "Loading ..."}
//             </p>
//         </Card>
//     );
// }

import React, { useState, useEffect } from "react";
import axios from "axios";
import { Card } from "flowbite-react";

export default function BooksCard() {
    const [book, setBook] = useState(null); // Initialize as null or appropriate initial value

    useEffect(() => {
        axios
            .get("http://127.0.0.1:8000/api/admin/products")
            .then((response) => {
                const booksData = response.data["books"];
                if (booksData && booksData.length > 0) {
                    // Assuming the first book or adjust according to your data structure
                    setBook(booksData[0]);
                }
            });
    }, []);

    return (
        <Card className="max-w-sm p-4" horizontal>
            <h5 className="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                Amount of Books
            </h5>
            <p className="font-normal text-gray-700 text-4xl dark:text-gray-400">
                {book ? book.Title.length : "Loading..."}
            </p>
        </Card>
    );
}
