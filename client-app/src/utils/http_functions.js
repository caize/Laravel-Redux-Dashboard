export function get_token(username, password) {
    console.log("mapdispatch");
    return fetch('api/token', {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body:"username=fsadf"
    })
}
