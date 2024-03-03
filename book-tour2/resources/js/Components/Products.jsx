import React, { useState, useEffect } from "react";
import axios from "axios";

export default function Products() {
    // user variable used to fetch user data from database via Axios
    const [book, setBook] = useState([]);
    const fetchData = () => {
        return axios
            .get("http://127.0.0.1:8000/api/admin/products")
            .then((response) => setBook(response.data["books"]));
    };

    useEffect(() => {
        fetchData();
    }, []);
    return (
        <div>
            <h1>Books</h1>
            <ul>
                {book &&
                    book.length > 0 &&
                    book.map((bookObj, index) => (
                        <li key={index}>{bookObj.Title}</li>
                    ))}
            </ul>
        </div>
    );
}
