import './bootstrap';
import '../css/app.css';
import ('./components/AdminPage')
import ('./components/Counter')

import { createRoot } from 'react-dom/client';
import { createInertiaApp } from '@inertiajs/react';


const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, App, props }) {
        const root = createRoot(el);

        root.render(<App {...props} />);
    },
    progress: {
        color: '#4B5563',
    },
});
