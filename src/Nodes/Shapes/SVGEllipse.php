<?php

namespace JangoBrick\SVG\Nodes\Shapes;

use JangoBrick\SVG\Nodes\SVGNode;
use JangoBrick\SVG\Rasterization\SVGRasterizer;

class SVGEllipse extends SVGNode
{
    private $cx, $cy, $rx, $ry;

    public function __construct($cx, $cy, $rx, $ry)
    {
        parent::__construct('ellipse');

        $this->cx = $cx;
        $this->cy = $cy;
        $this->rx = $rx;
        $this->ry = $ry;
    }

    /**
     * @SuppressWarnings("NPath")
     */
    public static function constructFromAttributes($attrs)
    {
        $cx = isset($attrs['cx']) ? $attrs['cx'] : '';
        $cy = isset($attrs['cy']) ? $attrs['cy'] : '';
        $rx = isset($attrs['rx']) ? $attrs['rx'] : '';
        $ry = isset($attrs['ry']) ? $attrs['ry'] : '';

        return new self($cx, $cy, $rx, $ry);
    }

    public function getCenterX()
    {
        return $this->cx;
    }

    public function setCenterX($cx)
    {
        $this->cx = $cx;
        return $this;
    }

    public function getCenterY()
    {
        return $this->cy;
    }

    public function setCenterY($cy)
    {
        $this->cy = $cy;
        return $this;
    }

    public function getRadiusX()
    {
        return $this->rx;
    }

    public function setRadiusX($rx)
    {
        $this->rx = $rx;
        return $this;
    }

    public function getRadiusY()
    {
        return $this->ry;
    }

    public function setRadiusY($ry)
    {
        $this->ry = $ry;
        return $this;
    }

    public function getSerializableAttributes()
    {
        $attrs = parent::getSerializableAttributes();

        $attrs['cx'] = $this->cx;
        $attrs['cy'] = $this->cy;
        $attrs['rx'] = $this->rx;
        $attrs['ry'] = $this->ry;

        return $attrs;
    }

    public function rasterize(SVGRasterizer $rasterizer)
    {
        $rasterizer->render('ellipse', array(
            'cx'    => $this->cx,
            'cy'    => $this->cy,
            'rx'    => $this->rx,
            'ry'    => $this->ry,
        ), $this);
    }
}
