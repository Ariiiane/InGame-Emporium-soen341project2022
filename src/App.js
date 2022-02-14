import './App.css';
import React from 'react'
import Header from './components/Header'
import {BrowserRouter, Router} from 'react-router-dom'
import login from './pages/Login'
import signup from './pages/Signup'
import list from './List'
import cart from './pages/Cart'

require('./bootstrap');
function App() {
  return (
    <div className="App">
      <BrowserRouter>
      <Header/>
      <h1>In Game Emporium</h1>
      </BrowserRouter>
    </div>
  );
}

export default App;
