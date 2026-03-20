<!--@vite(['resources/js/app.tsx', "resources/js/pages/{$page['component']}.tsx"]) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title> Laravel PHP and React Website </title>
<script src="https://unpkg.com/react@18/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js" crossorigin></script>
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .app {
            display: flex;
            height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            background: #1e293b;
            color: white;
            padding: 20px;
        }

        .sidebar h2 {
            margin-bottom: 20px;
        }

        .menu-item {
            padding: 10px;
            cursor: pointer;
            border-radius: 6px;
        }

        .menu-item:hover {
            background: #334155;
        }

        /* Main */
        .main {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* Header */
        .header {
            background: #f1f5f9;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }

        .tabs {
            display: flex;
            gap: 10px;
        }

        .tab {
            padding: 8px 16px;
            cursor: pointer;
            border-radius: 6px;
            background: #e2e8f0;
        }

        .tab.active {
            background: #3b82f6;
            color: white;
        }

        /* Content */
        .content {
            padding: 20px;
            flex: 1;
            background: #f8fafc;
        }
    </style>
</head>
<body>

<div id="root"></div>

<script type="text/babel">
const { useState } = React;

function Sidebar() {
    const items = ["Dashboard", "Users", "Settings"];

    return (
        <div className="sidebar">
            <h2>My App</h2>
            {items.map((item, index) => (
                <div key={index} className="menu-item">
                    {item}
                </div>
            ))}
        </div>
    );
}

function Header({ activeTab, setActiveTab }) {
    const tabs = ["Home", "Reports", "Analytics"];

    return (
        <div className="header">
            <div className="tabs">
                {tabs.map((tab, index) => (
                    <div
                        key={index}
                        className={`tab ${activeTab === tab ? "active" : ""}`}
                        onClick={() => setActiveTab(tab)}
                    >
                        {tab}
                    </div>
                ))}
            </div>
        </div>
    );
}

function Content({ activeTab }) {
    return (
        <div className="content">
            <h1>{activeTab}</h1>
            <p>This is the {activeTab} page content.</p>
        </div>
    );
}

function App() {
    const [activeTab, setActiveTab] = useState("Home");

    return (
        <div className="app">
            <Sidebar />
            <div className="main">
                <Header activeTab={activeTab} setActiveTab={setActiveTab} />
                <Content activeTab={activeTab} />
            </div>
        </div>
    );
}

ReactDOM.createRoot(document.getElementById("root")).render(<App />);
</script>

</body>
</html>
