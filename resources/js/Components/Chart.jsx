import React, { useState, useEffect } from "react";
import axios from "axios";
import { Line } from "react-chartjs-2";
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend,
    Filler,
} from "chart.js";
import "chartjs-adapter-date-fns";

ChartJS.register(
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend,
    Filler,
);

export default function LineChartComponent({ isLightMode }) {
    const [chartData, setChartData] = useState({
        datasets: [],
    });
    const [isSmallDataset, setIsSmallDataset] = useState(true);

    const token = localStorage.getItem("token");
    const isDarkMode = () =>
        document.documentElement.classList.contains("dark");

    useEffect(() => {
        axios
            .get("/api/admin/users-growth", {
                headers: { Authorization: `Bearer ${token}` },
            })
            .then((response) => {
                const growthData = response.data;
                const isSmall = growthData.length <= 10;
                setIsSmallDataset(isSmall);
                const labels = growthData.map((data) => data.date);
                const data = growthData.map((data) => data.count);

                setChartData({
                    labels: labels,
                    datasets: [
                        {
                            label: "Users Gained",
                            data: data,
                            fill: true,
                            backgroundColor: isLightMode
                                ? "rgba(16, 101, 134, 0.2)"
                                : "rgba(165, 243, 252, 0.2)",
                            borderColor: isDarkMode() ? "#a5f3fc" : "#106586",
                            pointBackgroundColor: isDarkMode()
                                ? "#a5f3fc"
                                : "#106586",
                            tension: 0.1,
                        },
                    ],
                });
            })
            .catch((error) => {
                console.error(
                    "There was an error fetching the user growth data: ",
                    error,
                );
            });
    }, [isLightMode, token]);

    const options = {
        scales: {
            x: {
                type: "time",
                time: {
                    parser: "yyyy-MM-dd",
                    unit: isSmallDataset ? "day" : "month",
                    displayFormats: {
                        day: "dd-MM",
                        month: "MMM yyyy",
                    },
                },
                grid: {
                    display: false,
                },
                ticks: {
                    color: isDarkMode() ? "white" : "black",
                },
            },
            y: {
                beginAtZero: true,
                grid: {
                    color: "rgba(255, 255, 255, 0.1)",
                },
                ticks: {
                    color: isDarkMode() ? "white" : "black",
                },
            },
        },
        plugins: {
            legend: {
                labels: {
                    color: isDarkMode() ? "white" : "black",
                },
            },
        },
        maintainAspectRatio: false,
    };

    return <Line data={chartData} options={options} />;
}
