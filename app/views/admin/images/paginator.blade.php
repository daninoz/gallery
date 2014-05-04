@if ($paginator->getLastPage() > 1)
	@if ($paginator->getCurrentPage() > 1)
		<a onclick="return findImage('{{ $paginator->getUrl($paginator->getCurrentPage()-1) }}');" href="{{ $paginator->getUrl($paginator->getCurrentPage()-1) }}" class="curved link-paginador"><< Previous</a>
	@endif
	@if ($paginator->getCurrentPage() < $paginator->getLastPage())
		<a onclick="return findImage('{{ $paginator->getUrl($paginator->getCurrentPage()+1) }}');" href="{{ $paginator->getUrl($paginator->getCurrentPage()+1) }}" class="curved link-paginador">Next >></a>
	@endif
@endif