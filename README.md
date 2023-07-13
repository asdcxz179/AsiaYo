# AsiaYo API 實作測驗

### 系統環境
**Laravel 9.52**
**PHP 8.1**

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

### 單元測試

```javascript
php artisan test
```
測試檢查
1. 未帶入正確參數，回傳狀態是否為正確/回傳是否為JSON格式
2. 帶入正確參數，回傳狀態是否為正確/回傳是否為JSON格式/轉換匯率是否正確
