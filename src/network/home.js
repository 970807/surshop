import {request} from './request';

export function getHomeMultidata(type) {
  return request({
    url: './home.php',
    params: {
      type
    }
  })
}

export function getHomeGoods(type, page) {
  return request({
    url: './home.php',
    params: {
      type,
      page
    }
  })
}