import './App.css';
import React from 'react'
import Header from './Header'
import {BrowserRouter, Router} from 'react-router-dom'
import login from './Login'
import signup from './Signup'
import list from './List'
import cart from './Cart'
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
