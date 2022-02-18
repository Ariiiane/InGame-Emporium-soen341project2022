import React, {Component} from "react";
import './App.css';
import {BrowserRouter, Router, Route, NavLink} from 'react-router-dom'
import Header from './components/Header'
import Signup from './components/Authentication/Signup'
import Login from './components/Authentication/Login'
import Home from './components/Authentication/Home'
import list from './List'
import cart from './pages/Cart'
import {Switch} from "react-router";

require('./bootstrap');

function App() {
    return (
        <div className="App">
            <BrowserRouter>
                <Header/>

                <Switch>
                    <Route exact path='/login' component={Login} />
                    <Route exact path='/sign-up' component={Signup} />
                </Switch>
            </BrowserRouter>
        </div>
    );
}

export default App;
