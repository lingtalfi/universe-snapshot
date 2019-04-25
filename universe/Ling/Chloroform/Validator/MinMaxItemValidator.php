<?php


namespace Ling\Chloroform\Validator;


use Ling\Chloroform\Exception\ChloroformException;
use Ling\Chloroform\Field\FieldInterface;

/**
 * The MinMaxItemValidator class.
 *
 * This class validates how many items the user chose.
 * It works with fields returning arrays (or null if nothing was set or no items was chosen).
 *
 *
 *
 * The validation depends on the properties set.
 *
 * If only min is set: validates only if the number of items chosen by the user is greater or equal to $min.
 * If only max is set: validates only if the number of items chosen by the user is less than or equal to $max.
 * If both min and max are set: validates only if the number of items chosen by the user is comprised between $min and $max (both included).
 *
 *
 */
class MinMaxItemValidator extends AbstractMinMaxValidator
{

    /**
     * Sets the min.
     *
     * @param int $min
     * @return $this
     */
    public function setMin(int $min)
    {
        $this->min = $min;
        return $this;
    }

    /**
     * Sets the max.
     *
     * @param int $max
     * @return $this
     */
    public function setMax(int $max)
    {
        $this->max = $max;
        return $this;
    }


    /**
     * @implementation
     */
    public function test($value, string $fieldName, FieldInterface $field, string &$error = null): bool
    {
        if (null === $this->min && null === $this->max) {
            throw new ChloroformException("At least one of the min or max property must be set.");
        }


        if (null === $value) {
            $number = 0;
        } elseif (is_array($value)) {
            $number = count($value);
        } else {
            throw new ChloroformException("This validator only works with arrays or the null value.");
        }


        if (null !== $this->min && null === $this->max) {
            if ($number < $this->min) {
                $error = $this->getErrorMessage("min", [
                    "fieldName" => $fieldName,
                    "min" => $this->min,
                    "number" => $number,
                ]);
                return false;
            }
        } elseif (null !== $this->max && null === $this->min) {
            if ($number > $this->max) {
                $error = $this->getErrorMessage("max", [
                    "fieldName" => $fieldName,
                    "max" => $this->max,
                    "number" => $number,
                ]);
                return false;
            }
        } elseif (null !== $this->min && null !== $this->max) {
            if ($number < $this->min || $number > $this->max) {
                $error = $this->getErrorMessage("between", [
                    "fieldName" => $fieldName,
                    "min" => $this->min,
                    "max" => $this->max,
                    "number" => $number,
                ]);
                return false;
            }
        }
        return true;
    }
}