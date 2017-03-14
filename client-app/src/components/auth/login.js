import React from 'react';
import {createStyleSheet} from 'jss-theme-reactor';
import customPropTypes from 'material-ui/utils/customPropTypes';
import {
    Card,
    CardHeader,
    CardContent,
    CardActions,
} from 'material-ui/Card';
import Layout from 'material-ui/Layout'
import Button from 'material-ui/Button';
import Divider from 'material-ui/Divider';
import Input from 'material-ui/Input';
import FormControl from 'material-ui/Form/FormControl';
import {LabelSwitch} from 'material-ui/Switch';


const styleSheet = createStyleSheet('Login', () => ({
    card: {
        marginTop: 160,
        maxWidth: 350,
        maxHeight: 500,
        margin: "auto",
    },
    button: {
        left: 230
    }
}));

export default function Login(props, context) {
    let username;
    let password;

    function handleSubmit(e) {
        // if(!Input.value.trim()){return}
        // console.log(props)
        // e.preventDefault()
        console.log(username)
        props.loginUser(username, password)
    }

    const classes = context.styleManager.render(styleSheet);

    return (
        <div>
            <Card className={classes.card}>
                <CardHeader className={classes.header} title="Login"/>
                <Divider/>
                <CardContent>
                    <Layout>
                        <FormControl className={classes.input}>
                            <Input
                                ref={node => {
                                    username = node
                                }}
                                id="username"
                                placeholder="Username"
                            />
                        </FormControl>
                        <FormControl className={classes.input}>
                            <Input
                                ref={node => {
                                    password = node
                                }}
                                id="password"
                                placeholder="Password"
                            />
                        </FormControl>

                        <Layout item xs={12}>
                            <LabelSwitch
                                checked={true}
                                label="Remember me"
                            />
                        </Layout>
                        <Layout item xs={12}>
                            <Button
                                raised primary className={classes.button}
                                onClick={(e) => handleSubmit(e)}
                            >
                                Login
                            </Button>
                        </Layout>
                    </Layout>
                </CardContent>
                <Divider/>
                <CardActions>
                    <Button compact primary>Forget Password?</Button>
                    <Button compact primary>Register</Button>
                </CardActions>
            </Card>
        </div>
    );
}

Login.contextTypes = {
    styleManager: customPropTypes.muiRequired,
    loginUser: React.PropTypes.func.isRequired,
};
