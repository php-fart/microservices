<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: users/v1/service.proto

namespace GRPC\ProtobufMetadata\Users\v1;

class Service
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GRPC\ProtobufMetadata\Users\v1\Request::initOnce();
        \GRPC\ProtobufMetadata\Users\v1\Response::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
users/v1/service.protousers.v1users/v1/response.proto2�
UsersServiceE
Get.users.v1.request.GetRequest.users.v1.response.GetResponse" N
Create.users.v1.request.CreateRequest!.users.v1.response.CreateResponse" N
Update.users.v1.request.UpdateRequest!.users.v1.response.UpdateResponse" B:�GRPC\\Services\\Users\\v1�GRPC\\ProtobufMetadata\\Users\\v1bproto3'
        , true);

        static::$is_initialized = true;
    }
}

