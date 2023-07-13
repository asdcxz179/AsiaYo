# AsiaYo API 實作測驗

### 匯率轉換API
**EndPoint:** Your Domain

* 匯率轉換

```javascript
http://{endPoint}/api/currency
```

**Request Parameter:**

| Data     | Require |  Type  | Example    |
| -------- | -----:  | :----: | :----:     |
| source   | Yes     | string | ex: USD    |
| target   | Yes     | string | ex: JPY    |
| amount   | Yes     | string | ex: $1,000 |

**Response:**

```javascript
{
	"msg": "success",
	"amount": "$170,496.525"
}
```
**Response Parameter:**

| Data     | Require |  Type  | Example    |
| -------- | -----:  | :----: | :----:     |
| msg      | Yes     | string | ex: success|
| amount   | Yes     | string | ex: $1,000 |

**Response Status COde:**

| Code     | Description |
| -------- | :----:      |
| 200      | success     |
| 422      | Request parameter error  |
| 500      | System error  |
