import React, { useState, useEffect } from "react";
import axios from "axios";
import BinButton from "./BinButton";
import EditBookButton from "./EditBook";
import FavouriteButton from "./FavouriteButton";
import AddBookButton from "./AddBookButton";

export default function Products() {
    // user variable used to fetch user data from database via Axios
    const removeBook = (Book_ID) => {
        const token = localStorage.getItem("token");
        axios
            .delete(`http://127.0.0.1:8000/api/admin/products/${Book_ID}`, {
                headers: { Authorization: `Bearer ${token}` },
            })
            .then(() => {
                const updatedBooks = book.filter(
                    (bookObj) => bookObj.Book_ID !== Book_ID,
                );
                setBook(updatedBooks);
            })
            .catch((error) => {
                console.error("There was an error removing the book: ", error);
            });
    };
    const [book, setBook] = useState([]);
    const imgprefix = "/images/";
    const fetchData = () => {
        const token = localStorage.getItem("token");
        return axios
            .get("http://127.0.0.1:8000/api/admin/products", {
                headers: { Authorization: `Bearer ${token}` },
            })
            .then((response) => setBook(response.data["books"]));
    };

    useEffect(() => {
        fetchData();
    }, []);
    const [favourite, setFavourite] = useState([]);
    const fetchMore = () => {
        return axios
            .get("http://127.0.0.1:8000/api/admin/favouritebooks")
            .then((response) => setFavourite(response.data["favourites"]));
    };

    useEffect(() => {
        fetchMore();
    }, []);
    return (
        <div className="border border-solid rounded-lg">
            <div className="w-max">
                <thead className="dark:text-white dark:bg-cyan-950 text-blue-900 font-bold w-full">
                    <tr className="">
                        <td>Book Title</td>
                        <td>Author</td>
                        <td className="md:inline-block hidden">Genre</td>
                        <td>Price</td>
                        <td>Stock</td>
                        <td className="lg:inline-block hidden">Image</td>
                        <td colspan="3">Action</td>
                    </tr>
                </thead>
                <tbody>
                    {book &&
                        book.length > 0 &&
                        book.map((bookObj) => (
                            <tr key={bookObj.Book_ID}>
                                <td className="font-bold">{bookObj.Title}</td>
                                <td>{bookObj.Author}</td>
                                <td className="">{bookObj.Genre}</td>
                                <td>{bookObj.Price}</td>
                                <td>{bookObj.Stock}</td>
                                <td className="lg:inline-block hidden">
                                    <img
                                        className="w-20 h-32"
                                        src={imgprefix + bookObj.file}
                                    ></img>
                                </td>
                                <td>
                                    <BinButton
                                        Book_ID={bookObj.Book_ID}
                                        onRemove={removeBook}
                                    />
                                </td>
                                <td>
                                    <EditBookButton bookObj={bookObj} />
                                </td>
                                <td>
                                    <FavouriteButton id={bookObj.Favourite} />
                                </td>
                            </tr>
                        ))}
                </tbody>
            </div>
            <div>
                <ul>
                    {favourite &&
                        favourite.length > 0 &&
                        favourite.map((faveObj, index) => {
                            <li key={index}>{faveObj.Title}</li>;
                        })}
                </ul>
            </div>
        </div>
    );
}
