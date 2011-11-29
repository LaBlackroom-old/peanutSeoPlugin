<?php

  function seo($role, $object, $default = null)
  {

    if($role == 'title' || $role == 'description' || $role == 'keywords')
    {
      seoMeta($role, $object, $default);
    }
    elseif($role == 'index')
    {
      seoIndex($object);
    }
    else
    {
      return null;
    }

  }

  function seoMeta($role, $object, $default)
  {
    $object = $object->getPeanutSeo()->$role;
    $slot = null;

    if($object)
    {
      $slot = slot($role, sprintf($object));
    }
    elseif($default !== null)
    {
      $slot = slot($role, sprintf($default));
    }

    return $slot;
  }

  function seoIndex($object)
  {
    $indexable = $object->getPeanutSeo()->getIsIndexable();
    $followable = $object->getPeanutSeo()->getIsFollowable();

    if($indexable && $followable)
    {
      return slot('robots', sprintf('index, follow'));
    }
    elseif($indexable && !$followable)
    {
      return slot('robots', sprintf('index, nofollow'));
    }
    elseif(!$indexable && $followable)
    {
      return slot('robots', sprintf('noindex, follow'));
    }
    else
    {
      return slot('robots', sprintf('noindex, nofollow'));
    }
  }