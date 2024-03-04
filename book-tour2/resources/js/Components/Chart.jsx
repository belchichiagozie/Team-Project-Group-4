import React from "react";
import { Line } from "react-chartjs-2";
import Chart from "chart.js/auto";

export default function LineChartComponent() {
    const chartData = {
        labels: ["January", "February", "March", "April", "May"],
        datasets: [
            {
                label: "Users Gained",
                data: [65, 59, 80, 81, 56],
                fill: false,
                backgroundColor: "rgb(75, 192, 192)",
                borderColor: "rgba(75, 192, 192, 0.2)",
            },
        ],
    };
    return <Line data={chartData} />;
}
