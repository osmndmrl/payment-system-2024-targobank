
const express = require('express');
const bodyParser = require('body-parser');
const crypto = require('crypto');

const app = express();
app.use(bodyParser.json());

app.post('/process-payment', (req, res) => {
    const paymentData = req.body;
    const hmac = crypto.createHmac('sha256', 'your-secret-key');
    hmac.update(paymentData.transactionId);
    const signature = hmac.digest('hex');

    if (signature === paymentData.signature) {
        res.status(200).send({ status: 'success', message: 'Payment processed successfully' });
    } else {
        res.status(400).send({ status: 'fail', message: 'Invalid signature' });
    }
});

app.listen(3000, () => {
    console.log('Payment processor listening on port 3000');
});
