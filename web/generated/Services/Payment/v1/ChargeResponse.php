<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: payment/v1/response.proto

namespace GRPC\Services\Payment\v1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>payment.v1.response.ChargeResponse</code>
 */
class ChargeResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.payment.v1.dto.Receipt receipt = 1;</code>
     */
    protected $receipt = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \GRPC\Services\Payment\v1\Receipt $receipt
     * }
     */
    public function __construct($data = NULL) {
        \GRPC\ProtobufMetadata\Payment\v1\Response::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.payment.v1.dto.Receipt receipt = 1;</code>
     * @return \GRPC\Services\Payment\v1\Receipt|null
     */
    public function getReceipt()
    {
        return isset($this->receipt) ? $this->receipt : null;
    }

    public function hasReceipt()
    {
        return isset($this->receipt);
    }

    public function clearReceipt()
    {
        unset($this->receipt);
    }

    /**
     * Generated from protobuf field <code>.payment.v1.dto.Receipt receipt = 1;</code>
     * @param \GRPC\Services\Payment\v1\Receipt $var
     * @return $this
     */
    public function setReceipt($var)
    {
        GPBUtil::checkMessage($var, \GRPC\Services\Payment\v1\Receipt::class);
        $this->receipt = $var;

        return $this;
    }

}
