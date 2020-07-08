<?php

abstract class ApptEncoder
{
    abstract public function encode(): string;
}

class BloggsApptEncoder extends ApptEncoder
{
    public function encode(): string
    {
        return "Appointment data encoded in BloggsCal format\n";
    }
}

abstract class TtdEncoder
{
    abstract public function encode(): string;
}

class BloggsTtdEncoder extends TtdEncoder
{
    public function encode(): string
    {
        return "ttd\n";
    }
}

abstract class ContactEncoder
{
    abstract public function encode(): string;
}

class BloggsContactEncoder extends ContactEncoder
{
    public function encode(): string
    {
        return "contact\n";
    }
}

abstract class CommsManager
{
    abstract public function getHeaderText(): string;
    abstract public function getApptEncoder(): ApptEncoder;
    abstract public function getTtdEncoder(): TtdEncoder;
    abstract public function getContactEncoder(): ContactEncoder;
    abstract public function getFooterText(): string;
}


class BloggsCommsManager extends CommsManager
{
    public function getHeaderText(): string
    {
        return "bloggsCal header\n";
    }

    public function getApptEncoder(): ApptEncoder
    {
        return new BloggsApptEncoder();
    }

    public function getTtdEncoder(): TtdEncoder
    {
        return new BloggsTtdEncoder();
    }

     public function getContactEncoder(): ContactEncoder
     {
        return new BloggsContactEncoder();
     }

    public function getFooterText(): string
    {
        return "bloggsCal footer\n";
    }
}