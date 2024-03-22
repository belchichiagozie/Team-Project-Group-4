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
            .get("/api/admin/products")
            .then((response) => setBook(response.data["books"]));
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
                        <td>Name</td>
                        <td>Surname</td>
                        <td>Orders</td>
                        <td>Total Purchased</td>
                        <td>Profile Pic</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Zahid</td>
                        <td>Faqiri</td>
                        <td>gsjsg</td>
                        <td>£82</td>
                        <td>
                            <img src="" alt="" />
                        </td>
                    </tr>
                </tbody>
            </div>
        </div>
    );
}
