<?php

namespace JangoBrick\SVG\Nodes\Shapes;

use JangoBrick\SVG\Nodes\SVGNode;
use JangoBrick\SVG\Rasterization\SVGRasterizer;

class SVGCircle extends SVGNode
{
    private $cx, $cy, $r;

    public function __construct($cx, $cy, $r)
    {
        parent::__construct('circle');

        $this->cx = $cx;
        $this->cy = $cy;
        $this->r  = $r;
    }

    public static function constructFromAttributes($attrs)
    {
        $cx = isset($attrs['cx']) ? $attrs['cx'] : '';
        $cy = isset($attrs['cy']) ? $attrs['cy'] : '';
        $r  = isset($attrs['r']) ? $attrs['r'] : '';

        return new self($cx, $cy, $r);
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

    public function getRadius()
    {
        return $this->r;
    }

    public function setRadius($r)
    {
        $this->r = $r;
        return $this;
    }

    public function getSerializableAttributes()
    {
        $attrs = parent::getSerializableAttributes();

        $attrs['cx'] = $this->cx;
        $attrs['cy'] = $this->cy;
        $attrs['r']  = $this->r;

        return $attrs;
    }

    public function rasterize(SVGRasterizer $rasterizer)
    {
        $rasterizer->render('ellipse', array(
            'cx'    => $this->cx,
            'cy'    => $this->cy,
            'rx'    => $this->r,
            'ry'    => $this->r,
        ), $this);
    }
}
