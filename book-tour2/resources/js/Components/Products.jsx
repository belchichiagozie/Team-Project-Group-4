import React, { useState, useEffect } from "react";
import axios from "axios";
import BinButton from "./BinButton";
import AddBookButton from "./AddBook";

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
        <div className="border border-solid">
            <h1>Books</h1>
            <thead>
                <tr>
                    <td>Book Title</td>
                    <td>Author</td>
                    <td>Genre</td>
                    <td>Price</td>
                    <td>Stock</td>
                    <td>Image</td>
                    <td colspan="3">Action</td>
                </tr>
            </thead>
            <tbody>
                {book &&
                    book.length > 0 &&
                    book.map((bookObj, index) => (
                        <tr>
                            <td key={index}>{bookObj.Title}</td>
                            <td key={index}>{bookObj.Author}</td>
                            <td key={index}>{bookObj.Genre}</td>
                            <td key={index}>{bookObj.Price}</td>
                            <td key={index}>{bookObj.Stock}</td>
                            <td key={index}>{bookObj.file}</td>
                            <td key={index}>
                                <BinButton />
                            </td>
                            <td key={index}>
                                <AddBookButton />
                            </td>
                            <td key={index}> Hello </td>
                        </tr>
                    ))}
            </tbody>
        </div>
    );
}
