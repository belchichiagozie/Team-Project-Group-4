import React from 'react'
import {Link} from 'react-router-dom'

export default function Dashboard() {
    return (
        <div>THIS IS DASHBOARD
             <a href="/admin/products"> go to products </a>
        </div>
    );
}

if(document.getElementById('dashboard')){
    ReactDOM.render(<Dashboard />, document.getElementById('dashboard'));
}