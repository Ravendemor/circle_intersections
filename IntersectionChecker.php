<?php

class IntersectionChecker
{
    /**
     * Проверяет окружность на пересечение хотя бы с одной из нескольких других окружностей
     *
     * @param Circle $circle
     * @param array $circles
     * @return bool
     */
    public static function areIntersectionsExist(Circle $circle, array $circles): bool
    {
        foreach($circles as $checkedCircle) {
            if(static::haveIntersections($circle, $checkedCircle)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Проверяет две окружности на пересечение
     *
     * @param Circle $circle
     * @param Circle $checkedCircle
     * @return bool
     */
    protected static function haveIntersections(Circle $circle, Circle $checkedCircle): bool
    {
        $distanceBetweenCenters = pow(
            pow($checkedCircle->coordX - $circle->coordX, 2) + pow($checkedCircle->coordY - $circle->coordY, 2),
            0.5
        );

        if ($distanceBetweenCenters === 0) {
            if ($checkedCircle->radius == $circle->radius) {
                return true;
            }
        } elseif ($distanceBetweenCenters < $circle->radius || $distanceBetweenCenters < $checkedCircle->radius) {
            $maxRadius = max($circle->radius, $checkedCircle->radius);
            $minRadius = min($circle->radius, $checkedCircle->radius);

            if ($minRadius + $distanceBetweenCenters >= $maxRadius) {
                return true;
            }
        } elseif ($circle->radius + $checkedCircle->radius >= $distanceBetweenCenters) {
            return true;
        }

        return false;
    }
}
