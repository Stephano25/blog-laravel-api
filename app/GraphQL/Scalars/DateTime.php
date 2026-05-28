<?php

namespace App\GraphQL\Scalars;

use GraphQL\Error\Error;
use GraphQL\Language\AST\StringValueNode;
use GraphQL\Type\Definition\ScalarType;

class DateTime extends ScalarType
{
    public string $name = 'DateTime';
    public ?string $description = 'The `DateTime` scalar type represents a date and time string.';

    public function serialize($value): string
    {
        if ($value instanceof \DateTimeInterface) {
            return $value->format('Y-m-d H:i:s');
        }
        
        if (is_string($value)) {
            return $value;
        }
        
        if (is_numeric($value)) {
            return date('Y-m-d H:i:s', $value);
        }
        
        return (string) $value;
    }

    public function parseValue($value): string
    {
        if (!is_string($value)) {
            throw new Error('Cannot parse value as DateTime');
        }
        
        return $value;
    }

    public function parseLiteral($valueNode, ?array $variables = null): string
    {
        if (!$valueNode instanceof StringValueNode) {
            throw new Error('DateTime cannot represent non-string type', $valueNode);
        }
        
        return $valueNode->value;
    }
}