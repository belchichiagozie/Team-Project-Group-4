import React, { useState, useEffect, useMemo } from "react";
import axios from "axios";
import BinButton from "./BinButton";
import EditBookButton from "./EditBook";
import FavouriteButton from "./FavouriteButton";
import AddBookButton from "./AddBookButton";

export default function Products() {
    const [book, setBook] = useState([]);
    const imgprefix = "/images/";
    const fetchData = () => {
        const token = localStorage.getItem("token");
        return axios
            .get("/api/admin/products", {
                headers: { Authorization: `Bearer ${token}` },
            })
            .then((response) => setBook(response.data["books"] || []));
    };
    const [sortConfig, setSortConfig] = useState({
        key: null,
        direction: "ascending",
    });
    const sortedBooks = useMemo(() => {
        let sortableBooks = [...(book ?? [])];
        if (sortConfig !== null) {
            sortableBooks.sort((a, b) => {
                if (a[sortConfig.key] < b[sortConfig.key]) {
                    return sortConfig.direction === "ascending" ? -1 : 1;
                }
                if (a[sortConfig.key] > b[sortConfig.key]) {
                    return sortConfig.direction === "ascending" ? 1 : -1;
                }
                return 0;
            });
        }
        return sortableBooks;
    }, [book, sortConfig]);
    const requestSort = (key) => {
        let direction = "ascending";
        if (sortConfig.key === key && sortConfig.direction === "ascending") {
            direction = "descending";
        }
        setSortConfig({ key, direction });
    };
    const removeBook = (Book_ID) => {
        const token = localStorage.getItem("token");
        axios
            .delete(`/api/admin/products/${Book_ID}`, {
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

    useEffect(() => {
        fetchData();
    }, []);
    const [favourite, setFavourite] = useState([]);
    const fetchMore = () => {
        return axios
            .get("/api/admin/favouritebooks")
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
                        <th onClick={() => requestSort("Title")}>
                            Title{" "}
                            {sortConfig.key === "Title"
                                ? sortConfig.direction === "ascending"
                                    ? "🔼"
                                    : "🔽"
                                : ""}
                        </th>
                        <th
                            onClick={() => requestSort("Author")}
                            className="hidden sm:table-cell"
                        >
                            Author{" "}
                            {sortConfig.key === "Author"
                                ? sortConfig.direction === "ascending"
                                    ? "🔼"
                                    : "🔽"
                                : ""}
                        </th>
                        <th
                            onClick={() => requestSort("Genre")}
                            className="md:table-cell hidden"
                        >
                            Genre{" "}
                            {sortConfig.key === "Genre"
                                ? sortConfig.direction === "ascending"
                                    ? "🔼"
                                    : "🔽"
                                : ""}
                        </th>
                        <th onClick={() => requestSort("Price")}>
                            Price{" "}
                            {sortConfig.key === "Price"
                                ? sortConfig.direction === "ascending"
                                    ? "🔼"
                                    : "🔽"
                                : ""}
                        </th>
                        <th onClick={() => requestSort("Stock")}>
                            Stock{" "}
                            {sortConfig.key === "Stock"
                                ? sortConfig.direction === "ascending"
                                    ? "🔼"
                                    : "🔽"
                                : ""}
                        </th>
                        <th className="table-cell md:hidden lg:table-cell">
                            Book
                        </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {sortedBooks &&
                        sortedBooks.length > 0 &&
                        sortedBooks.map((bookObj) => (
                            <tr key={bookObj.Book_ID}>
                                <td className="font-bold">{bookObj.Title}</td>
                                <td className="hidden sm:table-cell">
                                    {bookObj.Author}
                                </td>
                                <td className="md:table-cell hidden">
                                    {bookObj.Genre}
                                </td>
                                <td>{bookObj.Price}</td>
                                <td>{bookObj.Stock}</td>
                                <td className="table-cell md:hidden lg:table-cell">
                                    <img
                                        className="w-20 h-32"
                                        src={imgprefix + bookObj.file}
                                    ></img>
                                </td>
                                <td className="flex flex-col justify-around sm:flex-row h-full py-6">
                                    <div className="mb-6 sm:mb-0 sm:mr-2">
                                        <BinButton
                                            Book_ID={bookObj.Book_ID}
                                            onRemove={removeBook}
                                        />
                                    </div>
                                    <div className="mb-6 sm:mb-0 sm:mr-2">
                                        <EditBookButton bookObj={bookObj} />
                                    </div>
                                    <div>
                                        <FavouriteButton
                                            id={bookObj.Favourite}
                                        />
                                    </div>
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
