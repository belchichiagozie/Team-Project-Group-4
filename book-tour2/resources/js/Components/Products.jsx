import React, { useState, useEffect } from "react";
import axios from "axios";
import BinButton from "./BinButton";
import EditBookButton from "./EditBook";
import FavouriteButton from "./FavouriteButton";
import AddBookButton from "./AddBookButton";

export default function Products() {
    // user variable used to fetch user data from database via Axios
    const [book, setBook] = useState([]);
    const imgprefix = "/images/";
    const fetchData = () => {
        return axios
            .get("http://127.0.0.1:8000/api/admin/products")
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
                <thead className="text-blue-900 font-bold w-full">
                    <tr className="">
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
                                <td key={index} className="font-bold">
                                    {bookObj.Title}
                                </td>
                                <td key={index}>{bookObj.Author}</td>
                                <td key={index}>{bookObj.Genre}</td>
                                <td key={index}>{bookObj.Price}</td>
                                <td key={index}>{bookObj.Stock}</td>
                                <td key={index}>
                                    <img
                                        className="w-20 h-32"
                                        src={imgprefix + bookObj.file}
                                    ></img>
                                </td>
                                <td key={index}>
                                    <BinButton />
                                </td>
                                <td key={index}>
                                    <EditBookButton bookObj={bookObj} />
                                </td>
                                <td key={index}>
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
