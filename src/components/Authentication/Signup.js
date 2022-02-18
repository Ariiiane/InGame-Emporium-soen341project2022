import React, {Component} from "react";
import {Button, Form, FormGroup, Label, Input} from "reactstrap";
import axios from "axios";
import "./Authentication.css";
import {Link} from "react-router-dom";

export default class Signup extends Component {
    userData;

    constructor(props) {
        super(props);
        this.state = {
            signupData: {
                first_name: "",
                last_name: "",
                email: "",
                password: "",
                address: "",
                province: "",
                postal_code: "",
                isLoading: false,
            },
            msg: "",
        }
    }

    onChangehandler = (e, key) => {
        const {first_name, value} = e.target;
        this.setState({[first_name]: value});
    };
    onSubmitHandler = (e) => {
        e.preventDefault();

        this.setState({isLoading: true});
        axios
            .post("http://localhost:8000/api/user-signup", this.state.signupData)
            .then(response => {
                this.setState({
                    loading: false
                });
                if (response.data.status === 200) {
                    this.setState({
                        msg: response.data.message,
                        signupData: {
                            first_name: "",
                            last_name: "",
                            email: "",
                            password: "",
                            address: "",
                            province: "",
                            postal_code: "",
                        },
                    });
                    setTimeout(() => {
                        this.setState({msg: ""});
                    }, 2000);
                    window.location = "/home";
                } else if (response.data.status === "failed") {
                    this.setState({msg: response.data.message});
                    setTimeout(() => {
                        this.setState({msg: ""});
                    }, 2000);
                }

            })
            .catch((error) => {
                this.setState({
                    loading: false
                });
                if (error.response.data.status === "error") {
                    this.setState({msg: error.response.data.message});
                }
            });
    };

    render() {
        const isLoading = this.state.isLoading;
        return (
            <div>
                <h1 className="container">Sign Up</h1>
                <Form className="form">
                    <FormGroup>
                        <Label for="first_name">First Name</Label>
                        <Input
                            type="first_name"
                            name="first_name"
                            placeholder="Enter first name"
                            value={this.state.signupData.first_name}
                            onChange={this.onChangehandler}
                        />
                    </FormGroup>
                    <FormGroup>
                        <Label for="last_name">Last Name</Label>
                        <Input
                            type="last_name"
                            name="last_name"
                            placeholder="Enter last name"
                            value={this.state.signupData.last_name}
                            onChange={this.onChangehandler}
                        />
                    </FormGroup>
                    <FormGroup>
                        <Label for="email">Email</Label>
                        <Input
                            type="email"
                            name="email"
                            placeholder="Enter email"
                            value={this.state.signupData.email}
                            onChange={this.onChangehandler}
                        />
                    </FormGroup>
                    <FormGroup>
                        <Label for="password">Password</Label>
                        <Input
                            type="password"
                            name="password"
                            placeholder="Enter password"
                            value={this.state.signupData.password}
                            onChange={this.onChangehandler}
                        />
                    </FormGroup>
                    <FormGroup>
                        <Label for="address">Address</Label>
                        <Input
                            type="address"
                            name="address"
                            placeholder="Enter address"
                            value={this.state.signupData.address}
                            onChange={this.onChangehandler}
                        />
                    </FormGroup>
                    <FormGroup>
                        <Label for="province">Province</Label>
                        <Input
                            type="province"
                            name="province"
                            placeholder="Enter province"
                            value={this.state.signupData.province}
                            onChange={this.onChangehandler}
                        />
                    </FormGroup>
                    <FormGroup>
                        <Label for="postal_code">Postal Code</Label>
                        <Input
                            type="postal_code"
                            name="postal_code"
                            placeholder="Enter postal code"
                            value={this.state.signupData.postal_code}
                            onChange={this.onChangehandler}
                        />
                    </FormGroup>
                    <p className="text-white">{this.state.msg}</p>
                    <Button
                        className="text-center mb-4"
                        onClick={this.onSubmitHandler}
                    >
                        Sign Up
                        {isLoading ? (
                            <span
                                className="spinner-border spinner-border-sm ml-5"
                                role="status"
                                aria-hidden="true"
                            ></span>
                        ) : (
                            <span></span>
                        )}
                    </Button>
                    <br>
                    </br>
                    <Link to="/login" className="text-black ml-5">I'm already member</Link>
                </Form>
            </div>
        );
    }
}
