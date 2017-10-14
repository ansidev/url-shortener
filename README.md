# url-shortener
URL Shortener built with Lumen micro framework

## Usage

POST `/api/v1/shortenUrl`
```
{
    "url": "http://facebook.com"
}
```

Response should looks like this:
```
{
    "shortenUrl": "http:\/\/your.domain\/url\/51dda28cb04ca3692f405b07ddcd201f"
}
```
