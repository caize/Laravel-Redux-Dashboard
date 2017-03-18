import client from '../config/client'
export function get_token(username, password) {
    let client_secret = client.client_secret;
    let client_id = client.client_id;
    let grant_type = client.grant_type;
    return fetch('oauth/token', {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `username=${username}&password=${password}&client_secret=${client_secret}&client_id=${client_id}&grant_type=${grant_type}`
    })
}

export function register_user(username, email, password) {
    return fetch('api/auth/register', {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `name=${username}&password=${password}&email=${email}`
    })
}
