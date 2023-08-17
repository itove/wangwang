<?php

namespace App\Entity;

class Choice
{
    public const TRANSACTION_TYPES = [
        '分销佣金' => 0,
        '推荐代理商佣金' => 1,
        '推荐门店佣金' => 2,
        '中奖' => 3,
        '服务员扫码奖' => 4,
        '业务员扫码奖' => 5,
        '门店金额转入' => 6,
        '代理商(异业)分润' => 10,
        '区域代理商(异业)分润' => 11,
        '门店(异业)分润' => 12,
        '顾客中奖' => 13,
        '门店兑奖服务费' => 14,
        '顾客餐厅消费' => 15,
        '提现' => 20,
        '金额转至个人' => 21,
    ];
    
    public const SETTLE_TYPES = [
        'store' => 0,
        'serveStore' => 1
    ];
    
    public const SETTLE_STATUSES = [
        'unsettle' => 0,
        'settled' => 1
    ];
    
    public const PRIZE_TYPES = [
        'onemore' => 'onemore',
        'collect' => 'collect',
        'wx' => 'wx',
        'voucher' => 'voucher',
        'object' => 'object',
    ];
    
    public const ROLES = [
        'ROLE_HEAD',
        'ROLE_AGENCY',
        'ROLE_STORE',
        'ROLE_RESTAURANT',
        'ROLE_VARIANT_HEAD',
        'ROLE_VARIANT_AGENCY',
        'ROLE_VARIANT_STORE',
        'ROLE_ORG_ADMIN',
        'ROLE_ADMIN',
        'ROLE_STOREMAN',
        'ROLE_SALESMAN',
        'ROLE_WAITER',
    ];
    
    public const WXQR_TYPES = [
        'box' => 0,
        'bottle' => 1,
        'userqr' => 2,
    ];
    
    public const CLAIM_TYPES = [
        'one_more' => 0,
        'bidirectional_one_mroe' => 1,
        'three_to_one' => 1,
    ];
    
    public const CLAIM_STATUSES = [
        'pending' => 0,
        'claimed' => 1,
        'expired' => 2,
    ];
    
    public const BORROW_STATUSES = [
        'pending' => 0,
        'approved' => 1,
        'borrowed' => 2,
        'settled' => 3,
    ];

    public const BATCH_TYPES = [
        'new' => 0,
        'edit' => 1,
        'qr' => 2,
        'Export Str' => 3,
    ];
    
    public const BOTTLE_STATUSES = [
        'for_sale' => 0,
        'sold' => 1,
        'waiter_scanned' => 2
    ];

    public const REWARD_TYPES = [
        'agency' => 0,
        'variant_head' => 1,
        'variant_agency' => 2,
        'store' => 3,
        'variant_store' => 4,
        'restaurant' => 5,
        'customer' => 6,
    ];
    public const SHARE_TYPES = [
        'variant_store' => 0,
        'variant_agency' => 1,
        'variant_head' => 2,
        'return' => 3
    ];
    public const REWARD_SHARE_STATUSES = [
        'lock' => 0,
        'withdrawable' => 1,
        'withdraw_done' => 2,
        'return_lock' => 3,
        'returned' => 4,
    ];
    public const MEDIA_TYPESS = [
        'org' => 0,
        'product' => 1,
        'node' => 2,
        'node_body' => 3,
        'product_body' => 4,
        'widthdraw' => 5,
        'avatar' => 6
    ];
    public const ORDER_STATUSES = ['Pending' => 0, 'Cancelled' => 4, 'Success' => 5];
    public const WITHDRAW_STATUSES = ['Pending' => 0, 'Approved' => 3 , 'Rejected' => 4, 'Success' => 5, 'Fail' => 6];
    public const ORG_TYPES = [
        'agency' => 1,
        'store' => 2,
        'restaurant' => 3,
        'variant_head' => 10,
        'variant_agency' => 11,
        'variant_store' => 12,
    ];
    public const ORG_TYPES_ALL = [
        'head' => 0,
        'agency' => 1,
        'store' => 2,
        'restaurant' => 3,
        'customer' => 4,
        'variant_head' => 10,
        'variant_agency' => 11,
        'variant_store' => 12,
    ];
    public const REG_TYPES = [
        'agency' => 0,
        'store' => 1,
        'restaurant' => 2,
        'variant_head' => 3,
        'variant_agency' => 4,
        'variant_store' => 5,
    ];
    public const REG_STATUSES = [
        'pending' => 0,
        'deal' => 1,
    ];
    public const VOUCHER_TYPES = [
        // increase
        '进货' => 0,
        '购酒' => 3,
        '退货接收' => 5,
        '提现兑付' => 10,
        '顾客餐饮消费' => 12,
        '零售退货' => 13,
        '中奖-代金券' => 14,
        '中奖-随机金额代金券' => 15,
        // '代理商-进货' => 0,
        // '门店-进货' => 1,
        // '餐厅-进货' => 2,
        // '顾客-门店购酒' => 3,
        // '顾客-餐厅购酒' => 4,
        // '总公司-代理商退货' => 5,
        // '代理商-门店退货' => 6,
        // '代理商-餐厅退货' => 7,
        //'门店-顾客退货' => 8,
        //'餐厅-顾客退货' => 9,
        // '总公司-代理商提现' => 10,
        // '代理商-餐厅提现' => 11,
        // '餐厅-顾客餐饮消费' => 12,

        // decrease
        '发货' => 100,
        '酒零售' => 103,
        '退货发出' => 105,
        '申请提现' => 110,
        '餐饮消费' => 112,
        '酒退货' => 113,
        // '总部-代理商进货' => 100,
        // '代理商-门店进货' => 101,
        // '代理商-餐厅进货' => 102,
        // '门店-顾客购酒' => 103,
        // '餐厅-顾客购酒' => 104,
        // '代理商-退货' => 105,
        // '门店-退货' => 106,
        // '餐厅-退货' => 107,
        // '顾客-退货' => 108,
        // '顾客-退货' => 109,
        // '代理商-提现' => 110,
        // '餐厅-提现' => 111,
        // '顾客-餐饮消费' => 112,
        // system
        '内部调控' => 255,
    ];

    public static function get($taxon)
    {
        $taxon = strtoupper($taxon);
        $constant = constant('Self::' . $taxon);
        return $constant;
    }
}
