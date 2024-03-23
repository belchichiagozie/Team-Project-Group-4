import React, { useState, useEffect } from "react";
import axios from "axios";
import { Pie } from "react-chartjs-2";
import Chart from "chart.js/auto";

export default function BookSalesChart() {
    const [book, setBook] = useState([]);
    const token = localStorage.getItem("token");

    const isDarkMode = () =>
        document.documentElement.classList.contains("dark");

    useEffect(() => {
        axios
            .get("/api/admin/products", {
                headers: { Authorization: `Bearer ${token}` },
            })
            .then((response) => setBook(response.data["books"]));
    }, []);

    const generateColors = (count, alpha) => {
        const colors = [];
        const step = 360 / count;
        for (let i = 0; i < count; i++) {
            const hue = i * step;
            colors.push(`hsla(${hue}, 100%, 50%, ${alpha})`);
        }

        return colors;
    };

    const bookCount = book.length;
    const themeColors = isDarkMode()
        ? generateColors(bookCount, 0.4)
        : generateColors(bookCount, 0.6);

    const data = {
        labels: book.map((book) => book.Title),
        datasets: [
            {
                label: "Sales",
                data: book.map((book) => book.Stock),
                backgroundColor: themeColors,
                borderColor: themeColors.map((color) =>
                    color.replace("0.4", "1").replace("0.6", "1"),
                ),
                borderWidth: 2,
                hoverOffset: 8,
            },
        ],
    };

    const options = {
        responsive: true,
        plugins: {
            legend: {
                position: "top",
                labels: {
                    color: isDarkMode() ? "white" : "black",
                    padding: 20,
                    font: {
                        size: 10,
                    },
                },
            },
            tooltip: {
                usePointStyle: true,
                boxPadding: 6,
                caretPadding: 4,
                bodySpacing: 4,
                backgroundColor: isDarkMode()
                    ? "rgba(255,255,255,0.87)"
                    : "rgba(0,0,0,0.87)",
                titleColor: isDarkMode() ? "#000" : "#fff",
                bodyColor: isDarkMode() ? "#000" : "#fff",
                borderColor: "rgba(0,0,0,0)",
                borderWidth: 1,
            },
            title: {
                display: true,
                text: "Book Stock Distribution",
                color: isDarkMode() ? "white" : "black",
                font: {
                    size: 12,
                },
            },
        },
    };

    return <Pie data={data} options={options} />;
}
