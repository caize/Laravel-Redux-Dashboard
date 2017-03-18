import React from 'react';
import {registerUser} from '../actions/auth';
import {connect} from 'react-redux';
import Register from '../components/auth/register'

function mapStateToProps(state) {
    return {
        isAuthenticating: state.auth.isAuthenticating,
        statusText: state.auth.statusText,
    };
}

function mapDispatchToProps(dispatch) {
    return {
        registerUser: (username,email, password) => {
            dispatch(registerUser(username,email, password))
        }
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(Register);
