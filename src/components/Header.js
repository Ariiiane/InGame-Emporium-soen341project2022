import {Navbar,Nav, Container} from 'react-bootstrap'
import {Link} from 'react-router-dom'
import React from 'react'
function Header(){
    return(
        <div>
            <>
  <Navbar collapseOnSelect expand="lg" bg="dark" variant="dark">
    <Container>
    <Navbar.Brand href="#home">Home</Navbar.Brand>
    <Navbar.Toggle aria-controls="responsive-navbar-nav"/>
    <Navbar.Collapse id="responsive-navbar-nav">
    <Nav className="me-auto navbar_warapper">
      <Link to="/Login">Login</Link>
      <Link to="/Signup">Sign Up</Link>
      <Link to="/Cart">My Cart</Link>
      <Link to="/List">My list</Link>
    </Nav>
    </Navbar.Collapse>
    </Container>
  </Navbar>
</>
        </div>
    )
}

export default Header