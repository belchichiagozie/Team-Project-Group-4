import React, { useState, useEffect } from "react";
import axios from "axios";
import { Bar } from "react-chartjs-2";
import Chart from "chart.js/auto";

export default function BookStockChart({ isLightMode }) {
    const [book, setBook] = useState([]);

    useEffect(() => {
        axios
            .get("http://127.0.0.1:8000/api/admin/products")
            .then((response) => setBook(response.data["books"]));
    }, []);

    const options = {
        scales: {
            x: {
                ticks: {
                    color: isLightMode ? "black" : "white",
                },
                grid: {
                    color: "rgba(255, 255, 255, 0.1)",
                },
            },
            y: {
                ticks: {
                    color: isLightMode ? "black" : "white",
                },
                grid: {
                    color: "rgba(255, 255, 255, 0.1)",
                },
            },
        },
        plugins: {
            legend: {
                labels: {
                    color: isLightMode ? "black" : "white",
                },
            },
        },
    };
    const newData = {
        labels: book.map((item) => item.Title),
        datasets: [
            {
                label: "Stock of each book",
                data: book.map((item) => item.Stock),
                fill: true,
                backgroundColor: "#a5f3fc",
                borderColor: "#a5f3fc",
            },
        ],
    };
    return <Bar data={newData} options={options} />;
}

if (document.getElementById("bschart")) {
    ReactDOM.render(<BookStockChart />, document.getElementById("bschart"));
}
