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
        left: 210
    }
}));

export default function Register(props, context) {
    let username;
    let email;
    let password;

    function handleSubmit(e) {
      if(username.input.value &&email.input.value&& password.input.value){
        props.registerUser(username.input.value, email.input.value,password.input.value);
      }
    }

    const classes = context.styleManager.render(styleSheet);

    return (
        <div>
            <Card className={classes.card}>
                <CardHeader className={classes.header} title="Register"/>
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
                                    email = node
                                }}
                                id="email"
                                placeholder="email"
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
                            <Button
                                raised primary className={classes.button}
                                onClick={(e) => handleSubmit(e)}
                            >
                                Register
                            </Button>
                        </Layout>
                    </Layout>
                </CardContent>
                <Divider/>
                <CardActions>
                    <Button compact primary>have a account? Login</Button>
                </CardActions>
            </Card>
        </div>
    );
}

Register.contextTypes = {
    styleManager: customPropTypes.muiRequired,
    registerUser: React.PropTypes.func.isRequired,
};
