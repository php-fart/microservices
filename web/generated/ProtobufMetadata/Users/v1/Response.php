<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: users/v1/response.proto

namespace GRPC\ProtobufMetadata\Users\v1;

class Response
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GRPC\ProtobufMetadata\Users\v1\Message::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
users/v1/response.protousers.v1.response"1
ListResponse!
users (2.users.v1.dto.User"/
GetResponse 
user (2.users.v1.dto.User"2
CreateResponse 
user (2.users.v1.dto.UserB:�GRPC\\Services\\Users\\v1�GRPC\\ProtobufMetadata\\Users\\v1bproto3'
        , true);

        static::$is_initialized = true;
    }
}

