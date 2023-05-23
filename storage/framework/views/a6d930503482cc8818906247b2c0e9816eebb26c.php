<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?php echo e(__('Billing Invoice')); ?> </title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300&display=swap" rel="stylesheet">
</head>

<body>


    <style>
        * {
            font-family: 'Roboto', sans-serif;
            line-height: 26px;
            font-size: 15px;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        /*=========================================================
      [ Table ]
    =========================================================*/

        .custom--table {
            width: 100%;
            color: inherit;
            vertical-align: top;
            font-weight: 400;
            border-collapse: collapse;
            border-bottom: 2px solid #ddd;
            margin-top: 0;
        }

        .table-title {
            font-size: 24px;
            font-weight: 600;
            line-height: 32px;
            margin-bottom: 10px;
        }

        .custom--table thead {
            font-weight: 700;
            background: inherit;
            color: inherit;
            font-size: 16px;
            font-weight: 500;
        }

        .custom--table tbody {
            border-top: 0;
            overflow: hidden;
            border-radius: 10px;
        }

        .custom--table thead tr {
            border-top: 2px solid #ddd;
            border-bottom: 2px solid #ddd;
            text-align: left;
        }

        .custom--table thead tr th {
            border-top: 2px solid #ddd;
            border-bottom: 2px solid #ddd;
            text-align: left;
            font-size: 16px;
            padding: 10px 0;
        }

        .custom--table tbody tr {
            vertical-align: top;
        }

        .custom--table tbody tr td {
            font-size: 14px;
            line-height: 18px;
            vertical-align: top;
        }

        .custom--table tbody tr td:last-child {
            padding-bottom: 10px;
        }

        .custom--table tbody tr td .data-span {
            font-size: 14px;
            font-weight: 500;
            line-height: 18px;
        }

        .custom--table tbody .table_footer_row {
            border-top: 2px solid #ddd;
            margin-bottom: 10px !important;
            padding-bottom: 10px !important;

        }

        /* invoice area */
        .invoice-area {
            padding: 10px 0;
        }

        .invoice-wrapper {
            max-width: 650px;
            margin: 0 auto;
            box-shadow: 0 0 10px #f3f3f3;
            padding: 0px;
        }

        .invoice-header {
            margin-bottom: 40px;
        }

        .invoice-flex-contents {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            flex-wrap: wrap;
        }

        .invoice-logo {}

        .invoice-logo img {}

        .invoice-header-contents {
            float: right;
        }

        .invoice-header-contents .invoice-title {
            font-size: 40px;
            font-weight: 700;
        }

        .invoice-details {
            margin-top: 20px;
        }

        .invoice-details-flex {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 24px;
            flex-wrap: wrap;
        }

        .invoice-details-title {
            font-size: 24px;
            font-weight: 700;
            line-height: 32px;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .invoice-single-details {}

        .details-list {
            margin: 0;
            padding: 0;
            list-style: none;
            margin-top: 10px;
        }

        .details-list .list {
            font-size: 14px;
            font-weight: 400;
            line-height: 18px;
            color: #666;
            margin: 0;
            padding: 0;
            transition: all .3s;
        }

        .details-list .list strong {
            font-size: 14px;
            font-weight: 500;
            line-height: 18px;
            color: #666;
            margin: 0;
            padding: 0;
            transition: all .3s;
        }

        .details-list .list a {
            display: inline-block;
            color: #666;
            transition: all .3s;
            text-decoration: none;
            margin: 0;
            line-height: 18px
        }

        .item-description {
            margin-top: 10px;
        }

        .products-item {
            text-align: left;
        }

        .invoice-total-count {}

        .invoice-total-count .list-single {
            display: flex;
            align-items: center;
            gap: 30px;
            font-size: 16px;
            line-height: 28px;
        }

        .invoice-total-count .list-single strong {}

        .invoice-subtotal {
            border-bottom: 2px solid #ddd;
            padding-bottom: 15px;
        }

        .invoice-total {
            padding-top: 10px;
        }

        .terms-condition-content {
            margin-top: 30px;
        }

        .terms-flex-contents {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .terms-left-contents {
            flex-basis: 50%;
        }

        .terms-title {
            font-size: 18px;
            font-weight: 700;
            color: #333;
            margin: 0;
        }

        .terms-para {
            margin-top: 10px;
        }

        .invoice-footer {}

        .invoice-flex-footer {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 30px;
        }

        .single-footer-item {
            flex: 1;
        }

        .single-footer {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .single-footer .icon {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 30px;
            width: 30px;
            font-size: 16px;
            background-color: #000e8f;
            color: #fff;
        }

        .icon-details {
            flex: 1;
        }

        .icon-details .list {
            display: block;
            text-decoration: none;
            color: #666;
            transition: all .3s;
            line-height: 24px;
        }
    </style>

    <!-- Invoice area Starts -->
    <div class="invoice-area">
        <div class="invoice-wrapper">
            <div class="invoice-header">
                <div class="invoice-flex-contents">
                    <div class="invoice-logo">
                        <h2 class="invoice-title"><?php echo e(__('INVOICE')); ?> (<?php echo e($value); ?>)</h2>
                        <p>#<?php echo e($payment->invoiceId); ?></p>
                        <span>Payment Status:</span>
                        <?php if($payment->status == 2): ?>
                        <b>Confirmed</b>
                        <?php elseif($payment->status == 1): ?>
                        <b>Pending</b>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="invoice-details">
                <div class="invoice-details-flex">
                    <div class="invoice-single-details">
                        <h4 class="invoice-details-title"><?php echo e(__('Bill To:')); ?></h4>
                        <ul class="details-list ">
                            <li class="list" style="color: red"><?php echo e($payment->name); ?> </li>
                            <li class="list"> <a href="mailto:<?php echo e($payment->email); ?>"><?php echo e($payment->email); ?> </a> </li>
                            <li class="list"> <a href="tel:<?php echo e($payment->phone); ?>"><?php echo e($payment->phone); ?></a> </li>
                            <li class="list"><?php echo e($payment->created_at); ?></li>
                        </ul>
                    </div>
                    <div class="invoice-single-details" style="float:right;margin-top:-141px;">
                        <h4 class="invoice-details-title"><?php echo e(__('Ship To:')); ?></h4>
                        <ul class="details-list">
                            <li class="list"> <strong><?php echo e(__('Address')); ?>: </strong> <?php echo e($payment->address); ?> </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="item-description">
                <h5 class="table-title"><?php echo e(__('Include Services')); ?></h5>
                <table class="custom--table">
                    <thead>
                        <tr>
                            <th><?php echo e(__('Title')); ?></th>
                            <th><?php echo e(__('Unit Price')); ?></th>
                            <th><?php echo e(__('Quantity')); ?></th>
                            <th><?php echo e(__('Total')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($payment->package_id != null): ?>
                            <tr>
                                <td><?php echo e($payment->package->package_name); ?></td>
                                <td><?php echo e($payment->package->package_price); ?> Tk</td>
                                <td>1</td>
                                <td><?php echo e($payment->package->package_price); ?> Tk</td>
                            </tr>
                            <tr class="table_footer_row">
                                <td colspan="3"><strong><?php echo e(__('Sub Total')); ?></strong></td>
                                <td><strong><?php echo e($payment->package->package_price); ?> Tk</strong></td>
                            </tr>
                            <tr class="table_footer_row">
                                <td colspan="3"><strong><?php echo e(__('Tax (10%)')); ?></strong></td>
                                <td><strong><?php echo e(($payment->package->package_price / 100) * 10); ?> Tk</strong></td>
                            </tr>
                            
                        <?php else: ?>
                        <tr>
                            <td><?php echo e($payment->order->service_description); ?></td>
                            <td><?php echo e($payment->order->total); ?> Tk</td>
                            <td>1</td>
                            <td><?php echo e($payment->order->total); ?> Tk</td>
                        </tr>
                        <tr class="table_footer_row">
                            <td colspan="3"><strong><?php echo e(__('Sub Total')); ?></strong></td>
                            <td><strong><?php echo e($payment->order->total); ?> Tk</strong></td>
                        </tr>
                        <tr class="table_footer_row">
                            <td colspan="3"><strong><?php echo e(__('Tax (10%)')); ?></strong></td>
                            <td><strong><?php echo e(($payment->order->total / 100) * 10); ?> Tk</strong></td>
                        </tr>
                        <?php endif; ?>
                        <tr class="table_footer_row">
                            <td colspan="3"><strong><?php echo e(__('Total')); ?></strong></td>
                            <td><strong><?php echo e($payment->transaction_amount); ?> Tk</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Invoice area end -->

</body>

</html><?php /**PATH D:\PHP\Laravel_project_1\resources\views/billing_invoice.blade.php ENDPATH**/ ?>