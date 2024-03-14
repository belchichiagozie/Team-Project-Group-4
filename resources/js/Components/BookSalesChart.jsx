import React, { useState, useEffect } from "react";
import axios from "axios";
import { Pie } from "react-chartjs-2";
import Chart from "chart.js/auto";

export default function BookSalesChart({ isLightMode }) {
    const [book, setBook] = useState([]);

    useEffect(() => {
        axios
            .get("http://127.0.0.1:8000/api/admin/products")
            .then((response) => setBook(response.data["books"]));
    }, []);

    const colours = {
        light: {
            backgroundColour: [
                "rgba(255, 99, 132, 0.4)",
                "rgba(54, 162, 235, 0.4)",
                "rgba(255, 206, 86, 0.4)",
            ],
            borderColour: [
                "rgba(255, 99, 132, 1)",
                "rgba(54, 162, 235, 1)",
                "rgba(255, 206, 86, 1)",
            ],
        },
        dark: {
            backgroundColour: [
                "rgba(255, 99, 132, 0.2)",
                "rgba(54, 162, 235, 0.2)",
                "rgba(255, 206, 86, 0.2)",
            ],
            borderColour: [
                "rgba(255, 99, 132, 1)",
                "rgba(54, 162, 235, 1)",
                "rgba(255, 206, 86, 1)",
            ],
        },
    };

    const themeColors = isLightMode ? colours.light : colours.dark;

    const data = {
        labels: book.map((book) => book.Title),
        datasets: [
            {
                label: "Sales",
                data: book.map((book) => book.Stock),
                responsive: true,
                backgroundColor: themeColors.backgroundColour,
                borderColor: themeColors.borderColour,
                borderWidth: 1,
            },
        ],
    };

    const options = {
        plugins: {
            legend: {
                position: "top",
                labels: {
                    color: isLightMode ? "black" : "white",
                },
            },
            title: {
                display: true,
                text: "Book Stock Distribution",
                color: isLightMode ? "black" : "white",
            },
        },
    };

    return <Pie data={data} options={options} />;
}
