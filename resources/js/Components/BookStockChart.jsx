import React, { useState, useEffect } from "react";
import axios from "axios";
import { Bar } from "react-chartjs-2";
import Chart from "chart.js/auto";

export default function BookStockChart() {
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

    const themeStyles = {
        light: {
            backgroundColor1: "#4D89FF",
            backgroundColor2: "#FFC658",
            gridColor: "rgba(0, 0, 0, 0.1)",
            tickColor: "black",
        },
        dark: {
            backgroundColor1: "#1E40AF",
            backgroundColor2: "#F59E0B",
            gridColor: "rgba(255, 255, 255, 0.1)",
            tickColor: "white",
        },
    };

    const currentTheme = isDarkMode() ? themeStyles.dark : themeStyles.light;

    const options = {
        scales: {
            x: {
                ticks: {
                    color: currentTheme.tickColor,
                },
                grid: {
                    color: currentTheme.gridColor,
                },
            },
            y: {
                beginAtZero: true,
                ticks: {
                    color: currentTheme.tickColor,
                },
                grid: {
                    color: currentTheme.gridColor,
                },
            },
        },
        plugins: {
            legend: {
                labels: {
                    color: currentTheme.tickColor,
                },
            },
            tooltip: {
                mode: "index",
                intersect: false,
                bodySpacing: 8,
                titleMarginBottom: 10,
                titleColor: isDarkMode() ? "black" : "white",
                bodyColor: isDarkMode() ? "black" : "white",
                backgroundColor: isDarkMode()
                    ? "rgba(255,255,255,0.8)"
                    : "rgba(0,0,0,0.8)",
                borderColor: isDarkMode()
                    ? "rgba(255,255,255,0.9)"
                    : "rgba(0,0,0,0.9)",
                borderWidth: 1,
            },
        },
        responsive: true,
        maintainAspectRatio: false,
    };

    const newData = {
        labels: book.map((item) => item.Title),
        datasets: [
            {
                label: "Amount In Stock",
                data: book.map((item) => item.Stock),
                backgroundColor: currentTheme.backgroundColor1,
                borderColor: currentTheme.tickColor,
                borderWidth: 2,
            },
            {
                label: "Price (£)",
                data: book.map((item) => item.Price),
                backgroundColor: currentTheme.backgroundColor2,
                borderColor: currentTheme.tickColor,
                borderWidth: 2,
            },
        ],
    };

    return <Bar data={newData} options={options} />;
}
