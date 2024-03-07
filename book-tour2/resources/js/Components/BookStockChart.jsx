import React, { useState, useEffect } from "react";
import axios from "axios";
import { Bar } from "react-chartjs-2";
import Chart from "chart.js/auto";
import ReactDOM from "react-dom";

const options = {
    maintainAspectRatio: false,
    aspectRatio: 1,
};

export default function BookStockChart() {
    // user variable used to fetch user data from database via Axios
    const [book, setBook] = useState([]);
    useEffect(() => {
        const fetchData = () => {
            return axios
                .get("http://127.0.0.1:8000/api/admin/products")
                .then((response) => setBook(response.data["books"]));
        };
        fetchData();
    }, []);
    const newData = {
        labels: book.map((item) => item.Title),
        datasets: [
            {
                label: "Stock of each book",
                data: book.map((item) => item.Stock),
                fill: false,
                backgroundColor: "rgb(75, 192, 192)",
                borderColor: "rgba(75, 192, 192, 0.2)",
            },
        ],
    };
    return <Bar data={newData} />;
}

if (document.getElementById("bschart")) {
    ReactDOM.render(<BookStockChart />, document.getElementById("bschart"));
}
